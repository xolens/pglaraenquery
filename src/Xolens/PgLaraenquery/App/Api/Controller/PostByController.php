<?php

namespace Xolens\PgLaraenquery\App\Api\Controller;

use Illuminate\Http\Request;

class PostByController extends PostController
{
    public function createBy(Request $request, $baseroute, $id, $subroute){
        $keymap = $this->keyMap();
        if(array_key_exists($baseroute, $keymap)){
            $request->request->add([$keymap[$baseroute]=>$id]);
        }
        return parent::create($request, $subroute);
    }
    
    public function updateBy(Request $request, $baseroute, $id, $subroute){
        $keymap = $this->keyMap();
        if(array_key_exists($baseroute, $keymap)){
            $request->request->add([$keymap[$baseroute]=>$id]);
        }
        return parent::update($request, $subroute);
    }
    
    public function keyMap(){
        return [
            'group' => 'group_id',
            'form' => 'form_id',
            'field' => 'field_id',
            'participant' => 'participant_id',
            'group_participant' => 'group_participant_id',
            'table_field' => 'table_field_id',
            'section' => 'section_id',
            'enquiry' => 'enquiry_id',
            'field_value' => 'field_value_id',
            'form_section' => 'form_section_id',
            'participant_enquiry' => 'participant_enquiry_id',
            'table_column' => 'table_column_id',
            'section_field' => 'section_field_id',
        ];
    }
}
