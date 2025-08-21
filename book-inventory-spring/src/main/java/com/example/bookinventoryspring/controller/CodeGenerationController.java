package com.example.bookinventoryspring.controller;

import com.example.bookinventoryspring.dto.CodeGenerationResult;
import com.example.bookinventoryspring.service.CodeGenerationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class CodeGenerationController {

    @Autowired
    private CodeGenerationService codeGenerationService;

    @GetMapping("/code-generate")
    public String codeGenerate(@RequestParam("dusParam") String dusParam, Model model) {
        CodeGenerationResult result = codeGenerationService.generateCodes(dusParam);
        model.addAttribute("generatedCodes", result.getCodes());
        model.addAttribute("errors", result.getErrors());
        return "code-generate";
    }
}
