package com.example.MoepiPublishing.Controller;

import com.example.MoepiPublishing.Entity.Company;
import com.example.MoepiPublishing.Entity.Message;
import com.example.MoepiPublishing.Service.CompanyService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.view.RedirectView;

@Controller
public class WebsiteController {

    @Autowired
    private CompanyService companyService;

    @GetMapping("/")
    public String index(Model model) {
        model.addAttribute("message", new Message());
        return "index";  // This will serve index.html from the templates folder
    }

    // Handle form submission
    @PostMapping("/sendMessage")
    public String receiveMessage(Model model, @RequestParam("company") String companyName) {
        // Process the company value
        System.out.println("Received company: " + companyName);

        Company company = companyService.getCompanyByName(companyName);

        if (company == null) {
            model.addAttribute("responseMessage", "Company not found: " + companyName);
        } else {
            model.addAttribute("responseMessage", "Company selected: " + companyName);
            model.addAttribute("company", company);
        }
        System.out.println("company.url: " + company.getUrl());
        return "index"; // Show the same form page with a response
    }

    @PostMapping("/redirect")
    public RedirectView redirectToCpanel(@RequestParam(value = "companyurl", required = false) String companyName) {
        if (companyName == null || companyName.isEmpty()) {
            // Handle the case where the parameter is missing or empty
            return new RedirectView("/");
        }
        System.out.println("companyName.url: " +companyName);
        //Company company = companyService.getCompanyByName(companyName);

        if (!companyName.equals("not")) {
            return new RedirectView(companyName);
        }

        // Redirect to a default page if the company or URL is not found
        return new RedirectView("/");
    }

}
