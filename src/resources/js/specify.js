document.querySelectorAll('.specify-sidebar').forEach((sidebar) => {
    sidebar.querySelectorAll('.specify-node-children').forEach((child) => {
        // Check here to see if there is an active element anywhere in child and then get the parent and do not hide it at all
        let i = child.querySelectorAll('.specify-node-link.specify-node-link--active').length;
        if(i > 0){
            
        }else{
            child.classList.add('hidden');
        }  
    });
    sidebar.querySelectorAll('.specify-node-label').forEach(activator => {
        const parent = activator.parentElement;
        const neighbour = parent.querySelectorAll('.specify-node-children');
        activator.addEventListener('click', () => {
            neighbour.forEach((child) => {
                child.classList.toggle('hidden');
            });
        });
    })
});