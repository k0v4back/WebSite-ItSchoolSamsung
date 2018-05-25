<?php
return array(

	'new/([0-9]+)' => 'new/view/$1',
	'new' => 'new/list',

	'login' => 'login/index',
	'register' => 'register/index',
	'add' => 'add/index',

	'exit' => 'exit/index',
	'download' => 'download/index',
	'admin' => 'admin/index',

	'pdf' => 'pdf/index',

    'cabinet' => 'cabinet/cabinet',
//    'cabinet2' => 'cabinet/cabinet',

	'apilogin' => 'apilogin/index',
	'apicheck' => 'apicheck/index',
    'apihistory' => 'apihistory/index',
    'apiaddpassport' => 'apiaddpassport/index',
    'apicheckpassport' => 'apicheckpassport/index',
    'apirequestforconnect' => 'apirequestforconnect/index',
    'apirequest' => 'apirequest/index',

	'' => 'site/index', //SiteController actionIndex



	);