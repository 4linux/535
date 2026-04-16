# no-ipv6

A role to disable IPv6 in Linux hosts.

Actually there are published roles that does the same here. This one was created only for studying purposes.


## Requirements

None.

## Role Variables

None.

## Dependencies

None.

## Example Playbook

Usage is very simple:

```yaml
---
- name: Manage a Linux host
  gather_facts: false
  hosts:
    - foo
    - bar
  roles:
    - no-ipv6
```

## License

BSD

## Author Information

Alceu Rodrigues de Freitas Junior (glasswalk3r@yahoo.com.br)
