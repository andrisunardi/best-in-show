@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "509 - Bandwidth Limit Exceeded")
@section("code", "509")
@section("message", "Bandwidth Limit Exceeded")
@section("description", "The server is temporarily unable to service your request due to the site owner reaching his/her bandwidth limit. Please try again later")
