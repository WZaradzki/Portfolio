import { ref } from "vue";
import axios from "axios";

export default function useProjects() {
    const projects = ref ([])

    const getProjects = async () => {
       let response = await axios.get('/api/projects')
       projects.value = response.data;

    }

    return {
        projects,
        getProjects
    }
}