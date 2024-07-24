document.getElementById('commentForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const comment = document.getElementById('comment').value;

    if (username && comment) {
        const commentList = document.getElementById('commentList');
        const newComment = document.createElement('li');
        
        newComment.innerHTML = `<span class="username">${username}</span>: ${comment}`;
        commentList.appendChild(newComment);

        // Reset form
        document.getElementById('username').value = '';
        document.getElementById('comment').value = '';
    }
});
