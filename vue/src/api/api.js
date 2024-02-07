const PREFIX = '/api';
export default {
    async getAll() {
        const response = await fetch(`${PREFIX}/get-all`);
        return await response.json();
    },
    async addNewComment(formComment) {
        const response = await fetch(`${PREFIX}/save-comment`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formComment),
        });

        return await response.json();
    },
    async deleteComment(id) {
        const response = await fetch(`${PREFIX}/delete-comment`, {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({id})
        });

        return response.ok;
    },
}