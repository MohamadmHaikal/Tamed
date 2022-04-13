
    <div class="form-card Content">
        <div class="row">
            <div class="col-7">
                <h2 class="fs-title mb-4">{{__('Image Upload')}}:
                </h2>
            </div>
            <div class="col-5">
                <h2 class="steps">{{__('Forms')}}Step 3 - 4</h2>
            </div>
        </div>
        <div id="ImgContent" class="row fileContent">
        </div>

        <label for="file-upload" class="custom-file-upload mb-0">
            <a title="Attach a file"
                class="mr-2 pointer text-primary">
                <i class="las la-paperclip font-20"></i>
                <span class="font-17">{{__('Click here to attach an image/video')}}</span>
            </a>
        </label>
        <input id="file-upload" name='upload_cont_img[]' multiple class="file-upload"
        data-max-file-size="2M"
            type="file" accept="image/*,video/*"
            style="display:none;">

    </div>
    <div class="form-card">
        <div class="row">
            <div class="col-7">
                <h2 class="fs-title mb-4">{{__('File Upload')}}:
                </h2>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4 Content">
                <div id="55" class="row fileContent">

                </div>

                <label for="file-upload1"
                    class="custom-file-upload mb-0">
                    <a title="Attach a file"
                        class="mr-2 pointer text-primary btn btn-outline-primary">
                        <i class="las la-paperclip font-20"></i>
                        <span
                            class="font-17">{{__('Specifications + Quantities')}}</span>
                    </a>
                </label>
                <input class="file-upload" id="file-upload1"
                    name='upload_Specif_Quant[]' multiple
                    type="file" accept="image/*,video/*"
                    style="display:none;">

            </div>
            <div class="col-md-4 Content">
                <div id="55" class="row fileContent">

                </div>

                <label for="file-upload2"
                    class="custom-file-upload mb-0">
                    <a title="Attach a file"
                        class="mr-2 pointer text-primary btn btn-outline-primary">
                        <i class="las la-paperclip font-20"></i>
                        <span
                            class="font-17">{{__('3D files upload')}}</span>
                    </a>
                </label>
                <input class="file-upload" name='upload_3D_files[]'
                id="file-upload2"
                    multiple type="file"
                    accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf"
                    style="display:none;">

            </div>
            <div class="col-md-4 Content">
                <div id="55" class="row fileContent">

                </div>

                <label for="file-upload3"
                    class="custom-file-upload mb-0">
                    <a title="Attach a file"
                        class="mr-2 pointer text-primary btn btn-outline-primary">
                        <i class="las la-paperclip font-20"></i>
                        <span
                            class="font-17 ">{{__('Upload project plans')}}</span>
                    </a>
                </label>
                <input class="file-upload"
                id="file-upload3"
                    name='upload_project_plans[]' multiple
                    type="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
            text/plain, application/pdf" style="display:none;">

            </div>
        </div>

    </div>
    <input type="button" name="previous"
        class="previous action-button-previous btn btn-outline-primary"
        value="{{__('Forms')}}Previous" />
    <input type="button" name="next" 

        class="next action-button btn btn-primary"
        value="{{__('Forms')}}Next" id="createItem"/>
