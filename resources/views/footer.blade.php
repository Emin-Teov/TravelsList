<script>
    const body = document.querySelector("body");
    @if($is)
    const contacts = body.querySelectorAll(".contact-table");
    const formSort = body.querySelector("#formSort");
    const selectSort = body.querySelector(".selectSort");
    const close_content = body.querySelectorAll(".close-content_delete");
    const isDeleteBtns = body.querySelectorAll(".is_delete_contact");
    const deleteContent = body.querySelector("#detele_content");
    const deleteBtn = body.querySelector(".delete_contact");

    selectSort.addEventListener("change", ()=>{
        formSort.querySelector("[name='sort_value']").value = selectSort.value;
        formSort.submit();
    });

    selectContact && selectContact.addEventListener("input", ()=>{
        contacts.forEach(contact => {
            const text = contact.innerText.toUpperCase();
            if(text.includes(selectContact.value.toUpperCase())){
                contact.style.display = "flex";
            }else{
                contact.style.display = "none";
            }
        });
    });

    isDeleteBtns.forEach(isDelete => {
        isDelete.addEventListener("mousedown", ()=>{
            deleteContent.style.display = "flex";
            deleteContent.setAttribute('action','{{ url('/destroy') }}'+'/'+isDelete.getAttribute('data-target'));
        });
    });

    close_content.forEach(close => {
        close.addEventListener("mousedown", ()=> {
            deleteContent.style.display = "none";
        });
    });
    @endif
</script>