$(document).ready(function () {

    
    // Functionality for the Developer Navigation
    $('#dev_options_btn').click(()=>{
        
        $(".dev-options").toggleClass('show')
        console.log('btn works')
    })


    // Functionality for projects navigation
    console.log("still works fdfd wew")
    $('.project-nav-link').click((e)=>{
        console.log("anser",e.currentTarget.attributes['href'].value)
        e.preventDefault();
        let url  = "/api";
        let remainingUrl = e.currentTarget.attributes['href'].value;
        url += remainingUrl;
        console.log($('#projects-container') )

        $.getJSON(url, (data)=>{

            $('#projects-container').empty(); //consider using ajax so this is only set empty once a reponse is recived
            
            $.each(data.data, (i, {progress_status,project_image,id,title})=>{

                // deal with project image l8r

                let projectUrl = `/projects/${id}`;

                $('#projects-container').append(`

                    <div class="col-md-4 col-lg-3 d-flex justify-content-center mb-5">
                        <div class="project card d-flex flex-column align-items-center py-2 px-2">
                        <div class="project-img-container">
        
                        </div>
        
        
                        <div class="info align-self-start px-3 pt-4 w-100">
                            <div class="pb-3 d-flex justify-content-between align-items-center">
                                <h5 class="title mr-2 text-bold">${title}</h5>
                                <a href="${projectUrl}" class="btn btn-primary btn-sm">View</a>
                                
                            </div>
                            <div class="d-flex">
                                <h6 class="title mr-2 text-primary">Status - </h6>
                                <h6 class="value text-capitalize">${progress_status}</h6>
                            </div>
                        </div>
        
        
                        </div>
        
                    </div>
              
                
                `)

            })

        })

    })
    
})