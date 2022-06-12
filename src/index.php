<?php

require_once("request/Request.php");
require_once("request/RequestBody.php");
require_once("request/RequestBuilder.php");
require_once("request/RequestHeader.php");
require_once("request/RequestParams.php");

$data = '{
    "language":[
        {
            "id":1,
            "language_name":"tj"
        },
        {
            "id":2,
            "language_name":"ru"
        },
        {
            "id":3,
            "language_name":"en"
        }
    ],
    "test_types":[
        {
            "id":1,
            "type_name":"Simple Test"
        },{
            "id":2,
            "type_name":"Open Test"
        },{
            "id":3,
            "type_name":"Multiply Test"
        },{
            "id":4,
            "type_name":"Compatison"
        }
    ],
    "subject_type":[
        {        
        "subject_id":1,
        "test_type_id":1
        }
    ],
    "subjects":[
        {
            "id":1,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":2,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":3,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":4,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":5,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":6,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":7,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":8,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":9,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":10,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":11,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":12,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":13,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":14,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":15,
            "name":"Subject Name",
            "language_id":1
        }, {
            "id":15,
            "name":"Subject Name",
            "language_id":1
        }
    ]
}';

const BASE_URL = "http://127.0.0.1:8000/api/v1/subjects";
$request = RequestBuilder::newBuilder()->baseUrl(BASE_URL)->post()->addHeaderWithValue("store_key", "QXBpIGtleSDRgdC10YDQstC10YDQsCA=")->addParamWithName("ad", "true")->setBody($data)->build();
$response = $request->sendRequest();
var_dump($response);