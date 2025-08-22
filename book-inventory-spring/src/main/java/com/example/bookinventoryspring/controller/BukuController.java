package com.example.bookinventoryspring.controller;

import com.example.bookinventoryspring.model.Buku;
import com.example.bookinventoryspring.service.BukuService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import java.io.IOException;
import java.util.List;

@Controller
public class BukuController {

    @Autowired
    private BukuService bukuService;

    @GetMapping("/data-buku")
    public String dataBuku(@RequestParam(name = "dusParam", required = false) String dusParam, Model model) {
        List<String> dusList = bukuService.getDistinctNamaDus();
        model.addAttribute("dusList", dusList);

        if (dusParam != null && !dusParam.isEmpty()) {
            List<Buku> bukuList = bukuService.getBukuByDus(dusParam);
            model.addAttribute("bukuList", bukuList);
            model.addAttribute("selectedDus", dusParam);
        }

        return "data-buku";
    }

    @PostMapping("/import-excel")
    public String importExcel(@RequestParam("databuku") MultipartFile file, RedirectAttributes redirectAttributes) {
        if (file.isEmpty()) {
            redirectAttributes.addFlashAttribute("message", "Please select a file to upload");
            return "redirect:/";
        }

        try {
            bukuService.importExcel(file);
            redirectAttributes.addFlashAttribute("message", "You successfully uploaded '" + file.getOriginalFilename() + "'");
        } catch (IOException e) {
            redirectAttributes.addFlashAttribute("message", "Failed to upload file: " + e.getMessage());
        }

        return "redirect:/data-buku";
    }

    @GetMapping("/delete-dus")
    public String deleteDus(@RequestParam("dusParam") String dusParam, RedirectAttributes redirectAttributes) {
        bukuService.deleteBukuByDus(dusParam);
        redirectAttributes.addFlashAttribute("message", "Successfully deleted books in dus: " + dusParam);
        return "redirect:/data-buku";
    }
}
