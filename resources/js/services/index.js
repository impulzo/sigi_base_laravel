const api = {};

const factoryApi = (name) => {
    return new api[name]();
};

export default factoryApi;
