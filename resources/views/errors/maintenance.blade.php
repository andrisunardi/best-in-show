@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "503 - Maintenance")
@section("code", "503")
@section("message", "Maintenance")
@section("description", "Sorry, we are doing some maintenance. Please check back soon")
