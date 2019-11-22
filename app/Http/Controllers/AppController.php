<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use stdClass;
use Response;
use JWTAuth;
use DB;


class AppController extends Controller
{
  protected $moduleEntityPath;
  protected $className;
  protected $modelInstance;

  protected $generalValidations = [];
  protected $insertValidations = [];
  protected $updateValidations = [];
  protected $deleteValidations = [];

  protected $useUserAudit = false;

  function __construct() {
    if(isset($this->className)){
      if(isset($this->moduleEntityPath)){
        $fullPathClassName = $this->moduleEntityPath.'\\' . $this->className;
      }else{
        $fullPathClassName = 'App\\' . $this->className;
      }
      $this->modelInstance = new $fullPathClassName();
    }
  } 
  
  // Laravel Resource methods ------------------------------------

  public function show($id){
    $entity= $this->modelInstance->findOrFail($id);
    return Response::json($entity);
  }

  public function index(){
    $list= $this->modelInstance->all();
    return Response::json($list);
  }

  public function store(Request $request)
  {
    $request->validate($this->generalValidations);
    $request->validate($this->insertValidations);

    $entity= $request->all();

    if($this->useUserAudit == true){
      $entity->created_by = JWTAuth::toUser($request->input('token'))->id;
    }

    $newEntity = $this->modelInstance->create($entity);
    return Response::json(compact('newEntity'));
  }

  public function update(Request $request, $id)
  {
    $request->validate($this->generalValidations);
    $request->validate($this->updateValidations);

    $entity=$this->modelInstance->findOrFail($id);
    $entity->fill($request->all());

    if($this->useUserAudit == true){
      $entity->updated_by = JWTAuth::toUser($request->input('token'))->id;
    }

    $entity->save();
    return Response::json(compact('entity'));
  }

  public function destroy(Request $request,$id)
  {
    $request->validate($this->generalValidations);
    $request->validate($this->deleteValidations);

    $entity=$this->modelInstance->findOrFail($id);
    $this->modelInstance->destroy($id);
    return Response::json(compact('entity'));
  }

  // END Laravel Resource methods --------------------------------
  
  public function alreadyExist(Request $request)
  {
    // ---- GET Params ----------------------------------------------
    $module = $request->query('module');
    $model = $request->query('model');
    $column = $request->query('column');
    $value = $request->query('value');
    //---------------------------------------------------------------
    
    $fullPathClassName = 'Modules\\'.$module.'\\Entities\\'. $model;
    $modelInstance = new $fullPathClassName();
    $entity = $modelInstance->where($column,$value)->first();
    $alreadyExist = false;
    if(isset($entity))
      $alreadyExist = true;
    return Response::json(["exist" => $alreadyExist]);
  }

  public function genericSearch(Request $request)
  {

    // ---- GET Params ----------------------------------------------
    $module = $request->query('module');
    $model = $request->query('model');
    $textToSearch = $request->query('textToSearch');
    $columnsToBeReturned = $request->query('columnsToBeReturned');
    $columnsWhereSearch = $request->query('columnsWhereSearch');
    $columnsToBeOrderBy = $request->query('columnsToBeOrderBy');
    $pageSize = $request->query('pageSize');
    $enableDebug = $request->query('enableDebug');
    //---------------------------------------------------------------

    $fullPathClassName = 'Modules\\'.$module.'\\Entities\\'. $model;
    $modelInstance = new $fullPathClassName();
    $query = $modelInstance->query();
    
    if($columnsToBeReturned != null){
      $query = $query->select(explode(",", $columnsToBeReturned));
    }

    // if $textToSearch is null or empty, a general search will be performed (select * )
    // if $textToSearch is not null or empty, $columnsWhereSearch MUST have some value

    if($textToSearch != null && trim($textToSearch) != "" && $columnsWhereSearch != null ){
      echo($textToSearch);
      $counter = 0;
      foreach (explode(",", $columnsWhereSearch)  as $columnToSearch) {
        $counter++;
        $columnsToBeReturnedSplitted = explode("::", $columnToSearch);
        
        // single column, by default use orWhere
        // example:     name :: =
        // column to be search ---> name
        // operator to use     ---> =

        if(sizeof($columnsToBeReturnedSplitted) == 2){
          if($counter == 1)
            $query = $query->where(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]),trim($textToSearch));
          else
            $query = $query->orWhere(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
        } 

        // single column, by default use orWhere
        // example:     name :: = :: orWhere
        // column to be search ---> name
        // operator to use     ---> =
        // clause to use       ---> orWhere

        if(sizeof($columnsToBeReturnedSplitted) == 3){
          switch (trim($columnsToBeReturnedSplitted[2])) {
            case 'where':
              $query = $query->where(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]),trim($textToSearch));
              break;
            case 'orWhere':
              $query = $query->where(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]),trim($textToSearch));
              break;
            case 'whereBetween':
              $splittedValues = $explode(",", $textToSearch);
              $query = $query->whereBetween(trim($columnsToBeReturnedSplitted[0]),[intval($splittedValues[0]),intval($splittedValues[1])]);
              break;
            case 'orWhereBetween':
              $splittedValues = $explode(",", $textToSearch);
              $query = $query->orWhereBetween(trim($columnsToBeReturnedSplitted[0]),[intval($splittedValues[0]),intval($splittedValues[1])]);
              break;
            case 'whereNotBetween':
              $splittedValues = $explode(",", $textToSearch);
              $query = $query->whereNotBetween(trim($columnsToBeReturnedSplitted[0]),[intval($splittedValues[0]),intval($splittedValues[1])]);
              break;
            case 'orWhereNotBetween':
              $splittedValues = $explode(",", $textToSearch);
              $query = $query->orWhereNotBetween(trim($columnsToBeReturnedSplitted[0]),[intval($splittedValues[0]),intval($splittedValues[1])]);
              break;
            case 'whereIn':
              $splittedValues = $explode(",", $textToSearch);
              $query = $query->whereIn(trim($columnsToBeReturnedSplitted[0]),$splittedValues);
              break;
            case 'orWhereIn':
              $splittedValues = $explode(",", $textToSearch);
              $query = $query->orWhereIn(trim($columnsToBeReturnedSplitted[0]),$splittedValues);
              break;
            case 'whereNotIn':
              $splittedValues = $explode(",", $textToSearch);
              $query = $query->whereNotIn(trim($columnsToBeReturnedSplitted[0]),$splittedValues);
              break;
            case 'orWhereNotIn':
              $splittedValues = $explode(",", $textToSearch);
              $query = $query->orWhereNotIn(trim($columnsToBeReturnedSplitted[0]),$splittedValues);
              break;
            case 'whereNull':
              $query = $query->whereNull(trim($columnsToBeReturnedSplitted[0]));
              break;
            case 'orWhereNull':
              $query = $query->orWhereNull(trim($columnsToBeReturnedSplitted[0]));
              break;
            case 'whereNotNull':
              $query = $query->whereNotNull(trim($columnsToBeReturnedSplitted[0]));
              break;
            case 'orWhereNotNull':
              $query = $query->orWhereNotNull(trim($columnsToBeReturnedSplitted[0]));
              break;
            case 'whereDate':
              $query = $query->whereDate(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            case 'orWhereDate':
              $query = $query->orWhereDate(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            case 'whereMonth':
              $query = $query->whereMonth(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            case 'orWhereMonth':
              $query = $query->orWhereMonth(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            case 'whereDay':
              $query = $query->whereDay(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            case 'orWhereDay':
              $query = $query->orWhereDay(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            case 'whereYear':
              $query = $query->whereYear(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            case 'orWhereYear':
              $query = $query->orWhereYear(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            case 'whereTime':
              $query = $query->whereTime(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            case 'orWhereTime':
              $query = $query->orWhereTime(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            case 'whereColumn':
              $query = $query->whereColumn(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            case 'orWhereColumn':
              $query = $query->orWhereColumn(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
            
            default:
              $query = $query->orWhere(trim($columnsToBeReturnedSplitted[0]),trim($columnsToBeReturnedSplitted[1]), $textToSearch);
              break;
          }
        }
      }
    }
    
    if($columnsToBeOrderBy != null){
      $query = $query->orderBy($columnsToBeOrderBy);
    }
    
    if($enableDebug != null && $enableDebug === 'true'){
      DB::enableQueryLog();
    }
    
    if($pageSize != null){
      $resultSet = $query->paginate($pageSize);
    }else{
      $unifiedResult = new stdClass();
      $unifiedResult->data = $query->get();
      $resultSet = $unifiedResult;
    }

    if($enableDebug != null && $enableDebug === 'true'){
      $qLog = DB::getQueryLog();
      // dd($qLog);
      $resultSet->sql_query = $qLog[0]['query'];
      $resultSet->sql_query_values = $qLog[0]['bindings'];
      DB::disableQueryLog();
    }

    return Response::json($resultSet);
  }
}
