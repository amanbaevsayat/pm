@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/customers" method="POST">
            @csrf
            <div class="form-group row">
                <label for="start_date" class="col-sm-2 col-form-label">Дата старта</label>
                <div class="col-sm-10">
                    <div class="input-group date">
                        <input type="text" class="form-control" name="start_date" aria-label="Дата старта" readonly />
                        <div class="input-group-append">
                            <span class="input-group-text calendar-clickable">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="end_date" class="col-sm-2 col-form-label">Дата окончания</label>
                <div class="col-sm-10">
                    <div class="input-group date">
                        <input type="text" class="form-control" name="end_date" aria-label="Дата старта" readonly />
                        <div class="input-group-append">
                            <span class="input-group-text calendar-clickable">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Имя</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" value="" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Телефон</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" value="" name="phone">
                </div>
            </div>
            <div class="form-group row">
                <label for="remark_id" class="col-sm-2 col-form-label">Ремарка</label>
                <div class="col-sm-10">
                    <select name="remark_id" id="remark_id" class="form-control" name="remark_id">
                        @foreach($remarks as $remark)
                        <option style="background-color: {{$remark->color}};" value="{{$remark->id}}">
                            {{$remark->title}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="subscription_type_id" class="col-sm-2 col-form-label">Тип</label>
                <div class="col-sm-10">
                    <select name="subscription_type_id" id="subscription_type_id" class="form-control" name="subscription_type_id">
                        @foreach($subscriptionTypes as $subscriptionType)
                        <option value="{{$subscriptionType->id}}">
                            {{$subscriptionType->title}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="subscription_id" class="col-sm-2 col-form-label">Подписка</label>
                <div class="col-sm-10">
                    <select name="subscription_id" id="subscription_id" class="form-control" name="subscription_id">
                        <option value="">
                            Не выбрано
                        </option>
                        @foreach($subscriptions as $subscription)
                        <option value="{{$subscription->id}}">
                            {{$subscription->OriginId}}, {{$subscription->AccountId}}, {{$subscription->Email}}, {{$subscription->Status}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Добавить" class="btn btn-success" />
            </div>
        </form>
        <a href="/customers">К списку</a>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $("#subscription_id").on("change", function() {
            var emailInput = $("#email");
            var data = $.trim($("#subscription_id").find("option:selected").text()).split(',');
            emailInput.val(data[2]);
        });

        $(".date").datepicker({
            format: 'd MM yyyy',
            autoclose: true,
            todayHighlight: true,
            weekStart: 1,
        });
    });
</script>
@endsection