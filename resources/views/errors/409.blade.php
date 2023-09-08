@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "409 - Conflict")
@section("code", "409")
@section("message", "Conflict")
@section("description", "The request could not be completed because of a conflict in the request")
