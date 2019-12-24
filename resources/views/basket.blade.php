@extends('layouts.app')
 
@section('content')
<div class="row base_row">
        <div class="panel panel-default bas">
            <div class="panel-heading">Оформление и редактирование заказа</div>

            <table class="table table-bordered panel-body" widht="100%">
                <tr>
                    <td>
                        Изобрбажение
                    </td>
                    <td>
                        Название
                    </td>
                    <td>
                        Цена
                    </td>
                    <td>
                        Сумма
                    </td>
                    <td>
                        Действия
                    </td>
                </tr>
                <?php $itogo = 0; $colvo_vsego = 0;?>
                @foreach($arr_obj as $one => $value)
                    @if(isset($value->id))
                        <?php $summa = $value->price * 1;
                        $itogo += $summa;
                        $colvo = $val[$value->id];
                        $colvo_vsego += $colvo;
                        ?>
                        <tr>
                            <td>
                                <div align="center">
                                    <img src="{{asset((isset($value->picture)) ? '/uploads/'.$value->user_id.'/s_'.$value->picture : '#')}}"
                                         align="center"/>
                                </div>
                            </td>
                            <td>
                                <h3 class="panel-title">{{$value->name}}
                                </h3>
                            </td>
                            <td>
                                <div class="price">
                                    {{$value->price}}
                                </div>
                            </td>
                            <td>
                                {{$summa}}
                            </td>
                            <td>
                                <a href="{{asset('basket/delete/'.$value->id)}}"
                                   class="btn-times btn-cart">&times</a>
                                <form name="pro" action="{{asset('basket/edit/'.$value->id)}}" method="post">
                                    {{csrf_field()}}
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <input type="number" min="0" name="colvo" class="wid"
                                                       value="{{$colvo}}">
                                            </td>
                                            <td>
                                                <input type="submit" class="btn btn-primary btn-block btn-sm"
                                                       value="Пересчитать">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td class="" colspan="2">
                        <div align="right">Всего</div>
                    </td>
                    <td>
                        {{$colvo_vsego}}
                    </td>
                    <td colspan="3">
                        <div class="all"><b>{{$itogo}}</b> рублей</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/order') }}">
                                {!! csrf_field() !!}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Имя</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name"
                                               value="{{ (old('name') == true) ? old('name') : $name }}">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">E-Mail</label>

                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email"
                                               value="{{ (old('email') == true) ? old('email') : $email }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Телефон</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary btn-block" id="clearBasket">
                                            <i class="fa fa-btn fa-user"></i>Подтвердить заказ
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
