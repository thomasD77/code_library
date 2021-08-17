<template>
        <div class="container shadow my-5">
            <h2 class="text-center pt-4">Our Testimonials</h2>
            <h5 class="text-center">Shuffle over our customers and discover what they have to say about us...</h5>
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="row ">
                        <img :src="`/../divemaster_vue/public/images/testimonials/${testimonial.photo}`"
                             alt=""
                             :class="featuredTestimonial.id === testimonial.id ? 'myhover' : 'myhover2' "
                             v-for="testimonial in testimonials"
                             :key="testimonial.id"
                             @mouseover="updatedFeaturedTestimonial(testimonial)"
                             class="col-md-1 rounded-circle px-0 m-3 shadow"
                        >
                    </div>
                </div>

                <div class="col-md-6 my-4">
                    <card class="d-flex flex-column justifiy-content-center">
                      <img class="mx-auto my-2 rounded-circle shadow" width="150" height="150" :src="`/../divemaster_vue/public/images/testimonials/${featuredTestimonial.photo}`"  alt="">
                        <div class="card-title alert alert-dark">
                            <h3
                                v-text="featuredTestimonial.name"
                                class="text-center my-3"
                            >
                            </h3>
                            <blockquote
                                v-text="featuredTestimonial.message"
                                class="px-3 text-center"
                            >
                            </blockquote>
                        </div>
                    </card>
                </div>
            </div>
        </div>
</template>


<script>

import _ from 'lodash';

export default {
    name: "TestimonialComponent",
    data() {
        return {
            testimonials: {},
            featuredTestimonial: {},
        }
    },
    mounted() {
        this.axios
            .get('http://localhost/divemaster_vue/public/api/testimonials')
            .then(response => {
                this.testimonials = response.data;
                this.featuredTestimonial = this.testimonials[0]
            });
    },
    methods: {
        updatedFeaturedTestimonial: _.debounce(function (testimonial) {
            this.featuredTestimonial = testimonial
        },500)
    }
}
</script>





