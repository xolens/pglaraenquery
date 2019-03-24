<?php

namespace Xolens\PgLaraenquiry\App\Api\Controller;

use Illuminate\Http\Request;
use Xolens\PgLarautil\App\Api\Controller\BaseController;


use Xolens\PgLaraenquiry\App\Repository\View\GroupViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\FormViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\FieldViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\ParticipantViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\GroupParticipantViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\TableFieldViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\SectionViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\EnquiryViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\FieldValueViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\FormSectionViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\ParticipantEnquiryViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\TableColumnViewRepository;
use Xolens\PgLaraenquiry\App\Repository\View\SectionFieldViewRepository;

class GetController extends BaseController
{
    protected static $map;
    
    public static function map(){
        if(self::$map==null){
            self::$map =[
                'group' => ['repository' => new GroupViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'form' => ['repository' => new FormViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'field' => ['repository' => new FieldViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'participant' => ['repository' => new ParticipantViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'groupparticipant' => ['repository' => new GroupParticipantViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'tablefield' => ['repository' => new TableFieldViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'section' => ['repository' => new SectionViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'enquiry' => ['repository' => new EnquiryViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'fieldvalue' => ['repository' => new FieldValueViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'formsection' => ['repository' => new FormSectionViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'participantenquiry' => ['repository' => new ParticipantEnquiryViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'tablecolumn' => ['repository' => new TableColumnViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
                'sectionfield' => ['repository' => new SectionFieldViewRepository(),'ACTION' => ['PAGINATE','GET'] ],
            ];
        }
        return self::$map;
    }

    public function paginate(Request $request, $subroute){
        if($this->has($subroute, self::ACTION_PAGINATE)){
            $page = $request->input('page');
            $limit = $request->input('limit');
            $sorter = self::inflateSorter($request);
            $filterer = self::inflateFilterer($request);
            return self::jsonResponse($this->repo($subroute)->paginateSortedFiltered($sorter, $filterer, $limit, $page));
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
