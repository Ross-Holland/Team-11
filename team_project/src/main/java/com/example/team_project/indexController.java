package com.example.team_project;
import org.springframework.stereotype.Controller;
// import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.GetMapping;
import ch.qos.logback.core.model.Model;

@Controller
public class indexController {
    @GetMapping("/") 
    public String index(Model model){
        // test();
        return "index";
    }

    // public void test(){
    //     System.out.println("hi method");
    // }
}
