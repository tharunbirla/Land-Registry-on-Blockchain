// SPDX-License-Identifier: MIT
// OpenZeppelin Contracts (last updated v4.7.0) (access/Ownable.sol)

pragma solidity ^0.8.0;

import "./Ownable.sol";

contract LandRegistry is Ownable {

    string private _verifier;
    string private _country;
    string private _state;
    string private _city;
    string private _propertyaddress;
    string private _latitude;
    string private _longitude;

    constructor(string memory verifier, string memory country, string memory state, string memory city, string memory propertyaddress, string memory latitude, string memory longitude) {
        _verifier = verifier;
        _country = country;
        _state = state;
        _city = city;
        _propertyaddress = propertyaddress;
        _latitude = latitude;
        _longitude = longitude;
    }

    function Verifier() public view returns(string memory){
        return _verifier;
    }

    function Country() public view returns(string memory){
        return _country;
    }

    function State() public view returns(string memory){
        return _state;
    }

    function City() public view returns(string memory){
        return _city;
    }

    function Propertyaddress() public view returns(string memory){
        return _propertyaddress;
    }

    function Latitude() public view returns(string memory){
        return _latitude;
    }

    function Longitude() public view returns(string memory){
        return _longitude;
    }
}