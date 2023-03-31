export const getFileBase64 = async (file) => {
    const convertBase64 = (file) => {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = () => reject(reader.error);
        });
    };
    const fileConvert = await convertBase64(file);
    return fileConvert;
};

export const getFileBase64Fiscal = async (file) => {
    const convertBase64 = (file) => {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = () => reject(reader.error);
        });
    };
    const fileConvert = await convertBase64(file);
    return fileConvert.split("base64,")[1];
};
