import { ref } from "vue";
import axios from "axios";

export default function useExperiencies() {
    const experiencies = ref([]);

    const getExperiencies = async (lang) => {
        let response = await axios.get("/api/experiencies/" + lang);
        experiencies.value = response.data;
    };

    return {
        experiencies,
        getExperiencies,
    };
}
