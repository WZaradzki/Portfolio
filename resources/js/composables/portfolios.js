import { ref } from "vue";
import axios from "axios";

export default function useBio() {
    const portfolios = ref([]);
    const portfolio = ref([]);
    const nextPortfolio = ref([]);
    const prevPortfolio = ref([]);

    const getPortfolios = async (lang) => {
        let response = await axios.get("/api/portfolio-lang/" + lang);
        portfolios.value = response.data;
    };

    const getPortfolio = async (id) => {
        let response = await axios.get(
            "/api/portfolios/" + id.id.slug + "?lang=" + id.id.lang
        );
        portfolio.value = response.data;
    };

    const getNextPortfolio = async (id) => {
        let response = await axios.get(
            "/api/next-portfolio/" + id.id.slug + "?lang=" + id.id.lang
        );
        nextPortfolio.value = response.data;
    };
    const getPrevPortfolio = async (id) => {
        let response = await axios.get(
            "/api/prev-portfolio/" + id.id.slug + "?lang=" + id.id.lang
        );
        prevPortfolio.value = response.data;
    };

    return {
        portfolios,
        portfolio,
        nextPortfolio,
        prevPortfolio,
        getPortfolios,
        getPortfolio,
        getNextPortfolio,
        getPrevPortfolio,
    };
}
