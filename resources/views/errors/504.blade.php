@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "504 - Gateway Timeout")
@section("code", "504")
@section("message", "Gateway Timeout")
@section("description", "The server was acting as a gateway or proxy and did not receive a timely response from the upstream server")
