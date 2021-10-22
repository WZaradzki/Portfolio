import { ref } from "vue";
import axios from "axios";

export default function useTools() {
    const tools = ref([]);

    const getTools = async () => {
        let response = await axios.get("/api/tools");
        tools.value = response.data;
    };

    return {
        tools,
        getTools,
    };
}
