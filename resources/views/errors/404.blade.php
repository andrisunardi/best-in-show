@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section('title', '404 - Not Found')
@section('code', '404')
@section('message', 'Not Found')
@section('description', 'The requested page could not be found but may be available again in the future')
