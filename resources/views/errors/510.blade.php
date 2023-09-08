@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "505 - Not Extended")
@section("code", "505")
@section("message", "Not Extended")
@section("description", "Further extensions to the request are required for the server to fulfil it")
