<div>
    <button type="button" class="btn btn-dark rounded"  data-bs-toggle="modal" data-bs-target="#exampleModal">Email Us</button>

    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title d-flex align-items-center text-dark" id="exampleModalLabel"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-2 bi bi-envelope-open-fill" viewBox="0 0 16 16">
                            <path d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.313l6.709 3.933L8 8.928l1.291.717L16 5.715V5.4a2 2 0 0 0-1.059-1.765l-6-3.2zM16 6.873l-5.693 3.337L16 13.372v-6.5zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516zM0 13.373l5.693-3.163L0 6.873v6.5z"/>
                        </svg>To: info@divemaster.be</h5>
                    <button wire:click="modalSuccess"  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submitForm">
                        @if($success)
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <h4 class="alert-heading">{{ $success }}</h4>
                                <p class="alert-success">Thanks for your interest in our Company!</p>
                                <hr>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidde="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="modal-body">
                            <div  class="row">
                                <div class="col-12">
                                    <input id="input1" name="name" type="text" class="form-control my-1 styleinput" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1" wire:model="name">
                                    @error('name')
                                    <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input id="input2" name="email" type="text" class="form-control my-1" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" wire:model="email">
                                </div>
                                @error('email')
                                <p class="text-danger"> {{ $message }}</p>
                                @enderror
                                <div class="col-12">
                                    <input id="input3" name="subject" type="text" class="form-control my-1" placeholder="Subject" aria-label="Username" aria-describedby="basic-addon1" wire:model="subject">
                                </div>
                                @error('subject')
                                <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row my-3">
                                <div class="col-12">
                                    <textarea id="input4" name="body" class="form-control textfield" rows="10" cols="50" placeholder="Your message here..." aria-label="With textarea" wire:model="body"></textarea>
                                </div>
                                @error('body')
                                <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button wire:click="modalSuccess" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark">Send to Us</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
