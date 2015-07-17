<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Служители</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="users-table" class="row-border hover" cellspacing="0" width="100%" >
                        <thead>
                        <tr>
                            <th>Име</th>
                            <th>Длъжност</th>
                            <th>Права</th>
                            <th>Дата на раждане</th>
                            <th>Заплата</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Име</th>
                            <th>Длъжност</th>
                            <th>Права</th>
                            <th>Дата на раждане</th>
                            <th>Заплата</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="nameEdit" data-pk="{{ $user->id }}" >{{ $user->name }}</td>
                                <td>
                                    {!! Form::open(['data-employment','method'=>'POST','url'=>'/accounts/employment']) !!}
                                    {!! Form::text('user_id',$user->id,['style'=>'display:none']) !!}
                                    <select name="categories[]" class="select-account-position" multiple="multiple">
                                        @foreach($root_categories as $root)
                                            <optgroup label="{{ $root->name }}">
                                                @foreach($categories as $category)
                                                    @if($root->id == $category->parent_id)
                                                        @if( $user->categoryServices->contains($category->id ) )
                                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                        @else
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    {!! Form::close() !!}
                                </td>
                                <td class="roleselect" data-value="{{ $user->roles[0]->id }}" data-pk="{{ $user->id }}">{{ $user->roles[0]->name}}</td>
                                <td class="user-bdate" data-value="{{ $user->bDate }}"  data-pk="{{ $user->id }}" >{{ $user->bDate }}</td>
                                <td><p class="user-salary-icon">$</p><div class="user-salaray"  data-pk="{{ $user->id }}">{{ $user->salary }}</div></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- Row -->


