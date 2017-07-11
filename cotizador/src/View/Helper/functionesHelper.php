<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of app_form
 *
 * @author MrDaz_000
 */

namespace App\View\Helper;

use Cake\View\Helper;

class functionesHelper extends Helper {

    function getImageIcon($nameImg = '') {
        $urlFile = WWW_ROOT . 'img' . DS . 'iconos' . DS . $nameImg . '.png';
        if (!file_exists($urlFile)) {
            return 'iconos/zzz.png';
        } else {
            return 'iconos/' . $nameImg . '.png';
        }
    }

    function getTemplateInput() {
        return [
            'input' => "<input type='{{type}}' name='{{name}}' {{attrs}}>",
            'inputContainer' => "<div {{type}} {{required}} data-role='fieldcontain' >{{content}}</div>",
        ];
    }

    function getTemplateDiv() {
        return [
            'inputContainer' => "<div {{type}} {{required}} data-role='fieldcontain' >{{content}}</div>",
        ];
    }

    function getFormInputDiv($attrs = ['class' => 'col-sm-9', 'group' => 1, 'content' => 'fa fa-phone']) {

        if (!empty($attrs['class'])) {
            if (!empty($attrs['group'])) {
                return [
                    'input' => "<div class='" . $attrs['class'] . "'>" .
                    '<div class="input-group"><span class="input-group-addon">' .
                    ((!is_null(@$attrs['content_icon'])) ? '<i class="' . $attrs['content_icon'] . '"></i>' : $attrs['content_text']) .
                    '</span>' .
                    "<input type='{{type}}' name='{{name}}' {{attrs}}></div>" .
                    "</div>",
                    'inputContainer' => "<div class='form-group'>{{content}}</div>",
                    'inputContainerError' => "<div class='form-group has-error'>{{content}}</div>",
                ];
            } else {
                return [
                    'select' => "<div class='" . $attrs['class'] . "'><select name='{{name}}' {{attrs}}>{{content}}</select></div>",
                    'textarea' => "<div class='" . $attrs['class'] . "'><textarea name='{{name}}' {{attrs}}>{{value}}</textarea></div>",
                    'input' => "<div class='" . $attrs['class'] . "'><input type='{{type}}' name='{{name}}' {{attrs}}></div>",
                    'inputContainer' => "<div class='form-group'>{{content}}</div>",
                    'inputContainerError' => "<div class='form-group has-error'>{{content}}</div>",
                ];
            }
        } else {
            return [];
        }
    }

}