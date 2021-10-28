<template>
  <!-- bg-layout h-screen -->

  <div v-if="lang" class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="">
        <h2
          class="
            text-2xl
            sm:text-3xl
            md:text-4xl
            fr-color
            font-extrabold
            tracking-wide
            uppercase
          "
        >
          <span v-if="lang == 'PL'"> Kontakt</span>
          <span v-else>Contact</span>
        </h2>
      </div>

      <div class="mt-10">
        <div>
          <div class="mx-auto md:w-3/4">
            <div class="mt-5 md:mt-0 md:col-span-2">
              <form @submit.prevent="contactSend">
                <div class="">
                  <div class="px-4 py-5 grid space-y-6 sm:p-6">
                    <div class="col-span-12">
                      <label
                        for="name_surname"
                        class="block text-md font-bold th-color"
                      >
                        <span v-if="lang == 'PL'"
                          >Imię i Nazwisko / Nazwa Firmy</span
                        >
                        <span v-else>Name and Surname / Company name</span>
                      </label>

                      <input
                        v-model="form.name_surname"
                        type="text"
                        name="name_surname"
                        id="name_surname"
                        autocomplete="given-name"
                        class="
                          mt-1
                          focus:ring-yellow-500 focus:border-yellow-500
                          block
                          w-full
                          shadow-sm
                          sm:text-sm
                          border-gray-300
                          rounded-md
                          fr-bg
                        "
                      />
                      <span
                        v-if="errors && errors.name_surname"
                        class="text-red-500 font-bold text-lg"
                        >{{ errors.name_surname[0] }}</span
                      >
                    </div>
                    <div class="sm:pr-1 col-span-12 sm:col-span-6">
                      <label
                        for="email"
                        class="block text-md font-bold th-color"
                        >Email</label
                      >

                      <input
                        v-model="form.email"
                        type="email"
                        name="email"
                        id="email"
                        autocomplete="given-email"
                        class="
                          mt-1
                          focus:ring-yellow-500 focus:border-yellow-500
                          block
                          w-full
                          shadow-sm
                          sm:text-sm
                          border-gray-300
                          rounded-md
                          fr-bg
                        "
                      />
                      <span
                        v-if="errors && errors.email"
                        class="text-red-500 font-bold text-lg"
                        >{{ errors.email[0] }}</span
                      >
                    </div>

                    <div class="col-span-12 sm:col-span-6 sm:pl-1">
                      <label
                        for="phone"
                        class="block text-md font-bold th-color"
                      >
                        <span v-if="lang == 'PL'">Numer telefonu</span>
                        <span v-else>Phone number</span>
                      </label>

                      <input
                        v-model="form.phone"
                        type="text"
                        name="phone"
                        id="phone"
                        autocomplete="given-email"
                        class="
                          mt-1
                          focus:ring-yellow-500 focus:border-yellow-500
                          block
                          w-full
                          shadow-sm
                          sm:text-sm
                          border-gray-300
                          rounded-md
                          fr-bg
                        "
                      />
                    </div>
                    <div class="col-span-12">
                      <label
                        for="subject"
                        class="block text-md font-bold th-color"
                      >
                        <span v-if="lang == 'PL'">Temat</span>
                        <span v-else>Subject</span>
                      </label>

                      <input
                        v-model="form.subject"
                        type="text"
                        name="subject"
                        id="subject"
                        autocomplete="given-subject"
                        class="
                          mt-1
                          focus:ring-yellow-500 focus:border-yellow-500
                          block
                          w-full
                          shadow-sm
                          sm:text-sm
                          border-gray-300
                          rounded-md
                          fr-bg
                        "
                      />
                      <span
                        v-if="errors && errors.subject"
                        class="text-red-500 font-bold text-lg"
                        >{{ errors.subject[0] }}</span
                      >
                    </div>
                    <div class="col-span-12">
                      <label
                        for="text"
                        class="block text-md font-bold th-color"
                      >
                        <span v-if="lang == 'PL'">Treść wiadomości</span>
                        <span v-else>Message</span>
                      </label>
                      <div class="mt-1">
                        <textarea
                          v-model="form.text"
                          id="text"
                          name="text"
                          rows="3"
                          class="
                            shadow-sm
                            focus:ring-yellow-500 focus:border-yellow-500
                            mt-1
                            block
                            w-full
                            sm:text-sm
                            border border-gray-300
                            rounded-md
                            fr-bg
                          "
                          placeholder="Napisz do mnie wiadomość"
                        />
                        <span
                          v-if="errors && errors.text"
                          class="text-red-500 font-bold text-lg"
                          >{{ errors.text[0] }}</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="px-4 py-3 text-center th-color sm:px-6">
                    <input
                      v-if="lang == 'PL'"
                      type="submit"
                      :value="form_submitting.process ? 'Wysyłam' : 'Wyślij'"
                      :disabled="form_submitting.process"
                      class="
                        cursor-pointer
                        flex
                        items-center
                        justify-end
                        w-auto
                        px-5
                        py-3
                        border border-transparent
                        text-base
                        font-bold
                        rounded-md
                        th-bg
                        main-color
                        hover:opacity-25
                        mx-auto
                      "
                    />
                    <input
                      v-else
                      type="submit"
                      :value="form_submitting.process ? 'Processing..' : 'Send'"
                      :disabled="form_submitting.process"
                      class="
                        cursor-pointer
                        flex
                        items-center
                        justify-end
                        w-auto
                        px-5
                        py-3
                        border border-transparent
                        text-base
                        font-bold
                        rounded-md
                        th-bg
                        main-color
                        hover:opacity-25
                        mx-auto
                      "
                    />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <TransitionRoot appear :show="isOpen" as="template">
      <Dialog as="div" @close="closeModal">
        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="min-h-screen px-4 text-center">
            <TransitionChild
              as="template"
              enter="duration-300 ease-out"
              enter-from="opacity-0"
              enter-to="opacity-100"
              leave="duration-200 ease-in"
              leave-from="opacity-100"
              leave-to="opacity-0"
            >
              <DialogOverlay class="fixed inset-0" />
            </TransitionChild>

            <span class="inline-block h-screen align-middle" aria-hidden="true">
              &#8203;
            </span>

            <TransitionChild
              as="template"
              enter="duration-300 ease-out"
              enter-from="opacity-0 scale-95"
              enter-to="opacity-100 scale-100"
              leave="duration-200 ease-in"
              leave-from="opacity-100 scale-100"
              leave-to="opacity-0 scale-95"
            >
              <div
                class="
                  inline-block
                  w-full
                  max-w-md
                  p-6
                  my-8
                  overflow-hidden
                  text-left
                  align-middle
                  transition-all
                  transform
                  bg-white
                  shadow-xl
                  rounded-2xl
                "
              >
                <DialogTitle
                  as="h3"
                  class="text-lg font-medium leading-6 text-gray-900"
                >
                  Wysłano pomyślnie!
                </DialogTitle>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">
                    Bardzo dziękuje za kontakt, zwykle odpowiadam w parę godzin.
                  </p>
                </div>

                <div class="mt-4">
                  <button
                    type="button"
                    class="
                      inline-flex
                      justify-center
                      px-4
                      py-2
                      text-sm
                      font-medium
                      text-blue-900
                      bg-blue-100
                      border border-transparent
                      rounded-md
                      hover:bg-blue-200
                      focus:outline-none
                      focus-visible:ring-2
                      focus-visible:ring-offset-2
                      focus-visible:ring-blue-500
                    "
                    @click="closeModal"
                  >
                    Do napisania!
                  </button>
                </div>
              </div>
            </TransitionChild>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>
  </div>
</template>
<script>
import useContact from "../../composables/contact";
import { reactive, onMounted, watch, computed, ref } from "vue";
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogOverlay,
  DialogTitle,
} from "@headlessui/vue";

export default {
  components: {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogOverlay,
    DialogTitle,
  },
  props: {
    lang: {
      required: true,
      type: String,
    },
  },
  setup() {
    const isOpen = ref(false);

    const form = reactive({
      name_surname: "",
      email: "",
      phone: "",
      subject: "",
      text: "",
    });

    const form_submitting = reactive({
      process: false,
    });

    const { returnString, errors, sendMail } = useContact();

    const contactSend = async () => {
      form_submitting.process = true;
      await sendMail({ ...form });
      if (!errors.value) {
        isOpen.value = true;
        form.name_surname = "";
        form.email = "";
        form.phone = "";
        form.subject = "";
        form.text = "";
      }
      form_submitting.process = false;
    };

    return {
      form_submitting,
      form,
      errors,
      sendMail,
      returnString,
      contactSend,
      isOpen,
      closeModal() {
        isOpen.value = false;
      },
      openModal() {
        isOpen.value = true;
      },
    };
  },
};
</script>