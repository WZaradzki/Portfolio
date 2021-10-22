import { ref } from "vue";
import axios from "axios";

export default function useBio() {
    const portfolios = ref([]);
    const portfolio = ref([]);

    const getPortfolios = async (lang) => {
        let response = await axios.get("/api/portfolio-lang/" + lang);
        portfolios.value = response.data;
    };

    const getPortfolio = async (idLang) => {
        let response = await axios.get("/api/portfolios/" + idLang);
        portfolio.value = response.data;
    };

    return {
        portfolios,
        portfolio,
        getPortfolios,
        getPortfolio,
    };
}
