// This code throws error: logStr is not define
swal({
      title: "Problem",   
      text: "Problem processing request !",   
      type: "Error" 
});

// This code works perfect
// type argument accepts following: error,success,info,warning
// type is case sensitive "Error" in place of "error" will throw error
swal({
      title: "Problem",   
      text: "Problem processing request !",   
      type: "error" 
});