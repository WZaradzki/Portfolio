import { ref } from "vue";
import axios from "axios";

export default function useActivities() {
    const activities = ref([]);
    const activityLang = ref([]);

    const getActivities = async () => {
        let response = await axios.get("/api/activities");
        activities.value = response.data;
    };

    const getActivityLang = async (lang) => {
        let response = await axios.get("/api/activities/" + lang);
        activityLang.value = response.data;
    };

    return {
        activities,
        activityLang,
        getActivities,
        getActivityLang,
    };
}
