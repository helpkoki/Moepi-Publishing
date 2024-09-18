package com.example.MoepiPublishing.Entity;

import jakarta.persistence.*;

@Entity
@Table(name = "company")
public class Company {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "companyid")
    private Long companyId;

    @Column(name = "companyname", nullable = false, length = 30)
    private String companyName;

    @Column(name = "websitename", nullable = false, length = 35)
    private String websiteName;

    @Column(name = "username", nullable = false, length = 35)
    private String username;

    @Column(name = "url", nullable = false, length = 255)
    private String url;

    // Default constructor
    public Company() {}

    // Getters and setters
    public Long getCompanyId() {
        return companyId;
    }

    public void setCompanyId(Long companyId) {
        this.companyId = companyId;
    }

    public String getCompanyName() {
        return companyName;
    }

    public void setCompanyName(String companyName) {
        this.companyName = companyName;
    }

    public String getWebsiteName() {
        return websiteName;
    }

    public void setWebsiteName(String websiteName) {
        this.websiteName = websiteName;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getUrl() {
        return url;
    }

    public void setUrl(String url) {
        this.url = url;
    }
}
