import { ref } from "vue";
import axios from "axios";

export default function useBio() {
    const bio = ref([]);
    const bioLang = ref([]);

    const getBio = async () => {
        let response = await axios.get("/api/bio");
        bio.value = response.data;
    };

    const getBioLang = async (lang) => {
        let response = await axios.get("/api/bio/" + lang);
        bioLang.value = response.data;
    };

    return {
        bio,
        bioLang,
        getBio,
        getBioLang,
    };
}
