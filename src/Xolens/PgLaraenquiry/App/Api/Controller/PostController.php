<?php

namespace Xolens\PgLaraenquiry\App\Api\Controller;

use Illuminate\Http\Request;
use Xolens\PgLarautil\App\Api\Controller\BaseController;
use Validator;


use Xolens\PgLaraenquiry\App\Repository\GroupRepository;
use Xolens\PgLaraenquiry\App\Repository\FormRepository;
use Xolens\PgLaraenquiry\App\Repository\FieldRepository;
use Xolens\PgLaraenquiry\App\Repository\ParticipantRepository;
use Xolens\PgLaraenquiry\App\Repository\GroupParticipantRepository;
use Xolens\PgLaraenquiry\App\Repository\TableFieldRepository;
use Xolens\PgLaraenquiry\App\Repository\SectionRepository;
use Xolens\PgLaraenquiry\App\Repository\EnquiryRepository;
use Xolens\PgLaraenquiry\App\Repository\FieldValueRepository;
use Xolens\PgLaraenquiry\App\Repository\FormSectionRepository;
use Xolens\PgLaraenquiry\App\Repository\ParticipantEnquiryRepository;
use Xolens\PgLaraenquiry\App\Repository\TableColumnRepository;
use Xolens\PgLaraenquiry\App\Repository\SectionFieldRepository;

class PostController extends BaseController
{
    protected static $map;
    
    public static function map(){
        if(self::$map==null){
            self::$map =[
                'group' => ['repository' => new GroupRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'form' => ['repository' => new FormRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'field' => ['repository' => new FieldRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'participant' => ['repository' => new ParticipantRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'groupparticipant' => ['repository' => new GroupParticipantRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'tablefield' => ['repository' => new TableFieldRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'section' => ['repository' => new SectionRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'enquiry' => ['repository' => new EnquiryRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'fieldvalue' => ['repository' => new FieldValueRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'formsection' => ['repository' => new FormSectionRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'participantenquiry' => ['repository' => new ParticipantEnquiryRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'tablecolumn' => ['repository' => new TableColumnRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
                'sectionfield' => ['repository' => new SectionFieldRepository(),'ACTION' => ['STORE','UPDATE','DELETE'] ],
            ];
        }
        return self::$map;
    }

    public function create(Request $request, $subroute){
        if($this->has($subroute, self::ACTION_STORE)){
            $data = self::escapeData($request->except('id'));
            $validator = Validator::make(
                $data, 
                $this->repo($subroute)->validationRules($data),
                self::validationMessages($data, $subroute)
            );
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                return self::jsonError($errors->all());
            }
            return self::jsonResponse($this->repo($subroute)->create($data));
        }
        return $this->notFound($subroute);
    }
    
    public function update(Request $request, $subroute){
        if($this->has($subroute, self::ACTION_UPDATE)){
            $id = $request->input('id');
            $data = self::escapeData($request->all());
            $validator = Validator::make(
                $data, 
                $this->repo($subroute)->validationRules($data),
                self::validationMessages($data, $subroute)
            );

            if ($validator->fails()) {
                $errors = $validator->errors();
                return self::jsonError($errors->all());
            }
            return self::jsonResponse($this->repo($subroute)->update($id, $data));
        }
        return $this->notFound($subroute);
    }
    
    public function delete(Request $request, $subroute){
        if($this->has($subroute, self::ACTION_UPDATE)){
            $identifiers = json_decode($request->input('identifiers'));
            return self::jsonResponse($this->repo($subroute)->delete($identifiers));
        }
        return $this->notFound($subroute);
    }

    protected function has($subroute, $action) {
        return self::hasAction(self::map(), $subroute, $action);
    }

    public function repo($subroute){
        return self::repository(self::map(), $subroute);
    }
}
