import { Input } from '@chakra-ui/react';
import { SubmitButton } from '../atoms/SubmitButton';

export const SearchInput = () => {
  return (
    <>
      <Input placeholder="キーワードを入力" position="relative" />
      <SubmitButton>検索する</SubmitButton>
    </>
  );
};
