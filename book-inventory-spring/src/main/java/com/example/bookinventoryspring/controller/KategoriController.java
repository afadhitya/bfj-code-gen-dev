package com.example.bookinventoryspring.controller;

import com.example.bookinventoryspring.model.KodeBuku;
import com.example.bookinventoryspring.service.KodeBukuService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class KategoriController {

    @Autowired
    private KodeBukuService kodeBukuService;

    @GetMapping("/kategori-buku")
    public String kategoriBuku(Model model) {
        model.addAttribute("kodeBukuList", kodeBukuService.getAllKodeBuku());
        model.addAttribute("newKodeBuku", new KodeBuku());
        return "kategori-buku";
    }

    @PostMapping("/insert-kategori")
    public String insertKategori(@ModelAttribute KodeBuku newKodeBuku) {
        kodeBukuService.saveKodeBuku(newKodeBuku);
        return "redirect:/kategori-buku";
    }
}
