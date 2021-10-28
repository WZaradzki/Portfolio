import { ref } from "vue";
import axios from "axios";

export default function useExperiencies() {
    const returnString = ref([]);
    const errors = ref("");

    const sendMail = async (contact) => {
        errors.value = "";
        try {
            let response = await axios.post("/api/mail", contact);
            console.log(response);
            returnString.value = response.data;
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    return {
        errors,
        returnString,
        sendMail,
    };
}
