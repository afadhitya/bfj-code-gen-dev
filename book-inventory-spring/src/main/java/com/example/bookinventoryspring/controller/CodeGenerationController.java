package com.example.bookinventoryspring.controller;

import com.example.bookinventoryspring.dto.GeneratedCode;
import com.example.bookinventoryspring.service.CodeGenerationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.List;

@Controller
public class CodeGenerationController {

    @Autowired
    private CodeGenerationService codeGenerationService;

    @GetMapping("/code-generate")
    public String codeGenerate(@RequestParam("dusParam") String dusParam, Model model) {
        List<GeneratedCode> generatedCodes = codeGenerationService.generateCodes(dusParam);
        model.addAttribute("generatedCodes", generatedCodes);
        return "code-generate";
    }
}
