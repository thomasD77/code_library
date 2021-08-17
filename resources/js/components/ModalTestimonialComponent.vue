<template>
    <div class="d-flex justify-content-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark my-4" data-bs-toggle="modal" data-bs-target="#addNew">
            Share With Us
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNew" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex flex-column">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title mx-auto" id="exampleModalLabel">Have you worked together with Divemaster?</h5>
                        <p class="my-3 text-center">Please complete this form and let the world know how your experience was with us...</p>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addTestimonial" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"
                                           class="form-control"
                                           v-model="testimonial.name">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea type="text"
                                              class="form-control"
                                              v-model="testimonial.message">
                                    </textarea
                                    >
                                </div>
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file"
                                           accept="image/*"
                                           class="form-control"
                                           @change="uploadPhoto"
                                    >
                                </div>
                               <button
                                    type="submit"
                                    class="btn btn-dark w-100 mx-auto">Save My Testimonial!
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "ModalTestimonialComponent",
    data () {
        return {
            testimonial: {
                name: "",
                message: "",
                photo_id: ""
            },
            avatar: ""
        }
    },
    methods : {

        uploadPhoto(e){
            let file = e.target.files[0];
            let reader = new FileReader();

            if(file['size'] < 2111775)
            {
                reader.onloadend = (file) => {
                    //console.log('RESULT', reader.result)
                    this.testimonial.photo_id = reader.result;
                }
                reader.readAsDataURL(file);
            }else{
                alert('File size can not be bigger than 2 MB')
            }
        },

        addTestimonial() {
            this.axios
                .post('http://localhost/divemaster_vue/public/api/testimonials', this.testimonial)
                .then(response => "Post was completed")
                .catch(err => console.log(err))
                .finally(() => this.loading = false);
        },

    }

}

</script>

<style scoped>

</style>
