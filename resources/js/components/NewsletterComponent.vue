<template>
   <div id="bereikbaar" class="row mt-md-5 py-5 px-5 ">
        <div class="col-sm-8 offset-sm-2 d-md-flex justify-content-md-around align-items-center">
            <div v-show="message ==='' ">
                <h2 class="text-uppercase">Stay Connected</h2>
                <p>Subscribe to our newsleter and stay up to date with <br>
                    latest offers and upcoming trends</p>
            </div>
            <div id="form" class="input-group mb-3 d-flex justify-content-center">
                <form @submit.prevent="addReader" class="d-flex flex-column">
                    <label id="label" v-show="message ===''">
                        <input  id="inputmail"
                               name="newsletter"
                               type="email"
                               class="form-control ps-4 rounded-pill"
                               placeholder="E-mail..."
                               v-model="reader.email"
                                required
                        >

                        <button
                            :disabled="isDisabled"
                            class="my-lg-0 py-1 rounded-pill btn-dark"
                            type="submit"
                            id="btnnewsletter"
                        >
                            Send
                        </button
                        >
                    </label>
                </form>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-center">
                <button
                    v-show="message !=='' "
                    :class="message !== '' ? 'badge badge-dark p-4 my-4 shadow' : '' "
                    @click="clearMessage"
                >
                    {{ message }}
                </button
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NewsletterComponent",

    data() {
        return {
            message: "",
            reader: {
                email: "",
            },
        }
    },
    methods: {
        addReader() {
                var url =  window.location.pathname
                this.axios
                    .post('http://localhost/divemaster_vue/public/api/reader', this.reader)
                    .then(response => "Post was completed")
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false);
                console.log(url)

                this.message = "Thanks for Signing up to our Newsletter! Click here to add one more..."
                this.reader.email = ""

        },
        clearMessage(){
            this.message = ""
        }
    },
    computed: {
        isDisabled: function () {
            return !this.reader.email
        }
    }
}
</script>

<style scoped>

</style>
