package com.example.bookinventoryspring.controller;

import com.example.bookinventoryspring.service.BukuService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import java.util.List;

@Controller
public class HomeController {

    @Autowired
    private BukuService bukuService;

    @GetMapping("/")
    public String home(Model model) {
        List<String> dusList = bukuService.getDistinctNamaDus();
        model.addAttribute("dusList", dusList);
        return "index";
    }
}
