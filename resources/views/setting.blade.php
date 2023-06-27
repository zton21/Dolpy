@extends('layout.master')
@section('title', "Setting | Dolpy")

@section('content')
<div class="container">
    <div class="row">
        <div class="fs-3">Personal Setting</div>
    </div>
    <div class="row mt-2">
        <div class="col-8">
            <div class="input-group mb-3">
                <label for="inputGroupSelect01" class="form-label">Set Timezone</label>
                <select class="form-select" id="inputGroupSelect01">
                    <option selected>Asia/Jakarta</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
    </div>
</div>
@endsection