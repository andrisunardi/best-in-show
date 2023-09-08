@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "511 - Network Authentication Required")
@section("code", "511")
@section("message", "Network Authentication Required")
@section("description", "The client needs to authenticate to gain network access")
