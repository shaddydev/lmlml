@extends('admin.layout.app')
@section('title', 'Admin|Add-Product')
@section('content')
<section class="wrapper">
   <!--overview start-->
   <div class="row">
      <div class="col-lg-12">
         <h3 class="page-header">
            <i class="fa fa-laptop"></i>Products
         </h3>
         <ol class="breadcrumb">
            <li>
               <i class="fa fa-home"></i>
               <a href="{{url('/index')}}">Home</a>
            </li>
            <li>
               <i class="fa fa-laptop"></i>Product
            </li>
         </ol>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         @include('admin.message')
         <section class="panel">
            <header class="panel-heading">
               Add Product / Category
            </header>
            <div class="panel-body">
               <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype = "multipart/form-data">
                     {{csrf_field()}}
                     <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Name
                        <span class="required">*</span>
                        </label>
                        <div class="col-lg-10">
                           <input class="form-control" id="cname" name="name" minlength="3" type="text" onkeyup = "convertToSlug()" required value ="{{old('name')}}"/>
                           <span class = "text-danger">{{$errors->first('name')}}</span>
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">SKU
                        <span class="required">*</span>
                        </label>
                        <div class="col-lg-10">
                           <input class="form-control" id="sku" name="sku" minlength="3" type="text" value ="{{old('sku')}}"/>
                           <span class = "text-danger">{{$errors->first('sku')}}</span>
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="cemail" class="control-label col-lg-2">Slug</label>
                        <div class="col-lg-10">
                           <input class="form-control " id="slug" type="text" name="slug"  value ="{{old('slug')}}"/>
                           <span class = "text-danger">{{$errors->first('slug')}}</span>
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="agree" class="control-label col-lg-2 col-sm-3" >Type</label>
                        <div class="col-lg-10 col-sm-9">
                           <select class="form-control m-bot15" name = "type" id = "ptype">
                              <option value = "">Choose Type</option>
                              <option value = "0">Category</option>
                              <option value = "1">Product</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group" id = "category">
                        <label for="agree" class="control-label col-lg-2 col-sm-3">Category</label>
                        <div class="col-lg-10 col-sm-9">
                           <select class="form-control m-bot15" name = "category" >
                              <option value = "">Choose category</option>
                               <?php //print_r($category);?>
                              @forelse($category as $data)
                              <option value = "{{$data->id}}">{{parentcatname($data->parent_id) != '' ? parentcatname($data->parent_id)->name.'->' : ''}} {{ $data->name}}</option>
                              @empty
                              <option value = "">No Category Found</option>
                              @endforelse
                           </select>
                           <span class = "text-danger show">{{$errors->first('category')}}</span>
                        </div>
                     </div>
                     <!-- <div class="form-group">
                        <label class="control-label col-sm-2">Description</label>
                        <div class="col-sm-10">
                           <textarea class="form-control ckeditor" name="description" rows="6"></textarea>
                           <span class = "text-danger">{{$errors->first('description')}}</span>
                        </div>
                     </div> -->
                     <div class="form-group">
                        <label class="control-label col-sm-2">Product Image</label>
                        <div class="col-sm-10">
                           <a href="#myModal-1" data-toggle="modal">Upload Product images</a>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2">Banner Image</label>
                        <div class="col-sm-10">
                           <input type = "file" class="form-control" name="banner_img">
                           <span class = "text-danger">{{$errors->first('banner_img')}}</span>
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="ccomment" class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                           <input type="checkbox" name = "status" checked data-toggle="toggle" data-on="Enabled" data-off="Disabled" value = "1">
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="ccomment" class="control-label col-lg-2">Make a Feature</label>
                        <div class="col-lg-10">
                           <input type="checkbox" name = "is_feature"  data-toggle="toggle" data-on="Featured" data-off="Unfeatured" value = "1" >
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                           <button class="btn btn-primary" type="submit">Save</button>
                           <button class="btn btn-default" type="button">Cancel</button>
                        </div>
                     </div>
                     <!-- image Model box  -->
                     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                 <h4 class="modal-title">Choose Product Media</h4>
                              </div>
                              <div class="modal-body">
                                 <label for="inputEmail1" class=" control-label">Image</label>
                                 <div class="row addnew">
                                    <div class="col-lg-6">
                                       <div class="addMore">
                                          <div class="remove">
                                             <i class="icon_close_alt" aria-hidden="true"></i>
                                          </div>
                                          <div class="image_preview"></div>
                                          <div class="addbtn">
                                             <span>+</span>Add Image
                                             <input type="file" name = "product_img[]" class="form-control uploadFile">
                                          </div>
                                       </div>
                                       <div class = "defaultclass">
                                          <label>Make a default :</label>
                                          <input type = "hidden" name = "is_default[]" class = "codeview">   
                                          <input type = "radio" name = "radiobutton[]" class="radioclass"  value = "1" checked>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 control-label">Video URL</label>
                                    <div class="col-lg-8">
                                       <input type="text" class="form-control" id="video" name = "videourl[]" placeholder="Enter Video URL">
                                    </div>
                                    <div class="col-lg-2">
                                       <button type = "button" class = "btn btn-primary addvideo">Add</button>
                                    </div>
                                 </div>
                                 <div class = "addmorevideo"></div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-success" data-dismiss="modal">Done</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </section>
      </div>
   </div>
</section>
@endsection