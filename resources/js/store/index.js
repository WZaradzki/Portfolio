import { createStore } from "vuex";
import createPersistedState from "vuex-persistedstate";
import SecureLS from "secure-ls";
var ls = new SecureLS({ isCompression: false });

// Create a new store instance.
export default createStore({
    state() {
        return {
            lang: "PL",
        };
    },
    getters: {
        Lang: (state) => state.lang,
    },
    mutations: {
        CHANGE_lang(state, item) {
            state.lang = item;
        },
    },
    actions: {
        ChangeLang(context, item) {
            context.commit("CHANGE_lang", item);
        },
    },
    plugins: [
        createPersistedState({
            storage: {
                getItem: (key) => ls.get(key),
                setItem: (key, value) => ls.set(key, value),
                removeItem: (key) => ls.remove(key),
            },
        }),
    ],
});
